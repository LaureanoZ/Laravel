<?php

namespace App\Http\Controllers;

use App\Models\Adults;
use App\Models\Design;
use App\Models\Field;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with(['field', 'adult', 'designs'])->get();
        return view(
            'services.index',
            ['services' => $services]
        );
    }
    public function view($id)
    {
        $service = Service::findOrFail($id);


        return view(
            'services.view',
            ['service' => $service]
        );
    }

    public function formNew()
    {
        return view('services.new', [
            'fields'  => Field::all(),
            'adults'  => Adults::all(),
            'designs' => Design::orderBy('name')->get(),
        ]);
    }
    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Service::validationRules(), Service::validationMessages());

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        };
        try {

            DB::transaction(function () use ($data) {
                $service = Service::create($data);
                $service->designs()->attach($data['design_id'] ?? []);
            });

            return redirect()
                ->route('admin.servicesDashboard')
                ->with('feedback.message', 'El servicio <b>' . e($data['title']) . '</b> se publico correctamente');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.servicesDashboard')
                ->withInput()
                ->with('feedback.message', 'Ocurrio un error, Vuelve a intentarlo')
                ->with('feedback.type', 'danger');
        }
    }

    public function formUpdate($id)
    {
        return view('services.formUpdate', [
            'service' => Service::findOrFail($id),
            'fields' => Field::all(),
            'adults' => Adults::all(),
            'designs' => Design::orderBy('name')->get(),
        ]);
    }


    public function processUpdate($id, Request $request)
    {
        try {

            $service = Service::findOrFail($id);

            $request->validate(Service::validationRules(), Service::validationMessages());

            $data = $request->except(['_token']);
            $oldImage = null;

            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request);
                $oldImage = $service->image;
            }

            DB::transaction(function () use ($service, $data) {
                $service->update($data);
                $service->designs()->sync($data['design_id'] ?? []);
            });

            $this->deleteImage($oldImage);

            return redirect()
                ->route('admin.servicesDashboard')
                ->with('feedback.message', 'El servicio <b>' . e($service->title) . '</b> se editó con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.servicesDashboard')
                ->with('feedback.message', 'Ocurrio un error inesperado, intenta nuevamente')
                ->with('feedback.type', 'danger');
        }
    }


    public function confirmDelete($id)
    {
        return view('services.confirmDelete', [
            'service' => Service::findOrFail($id),
            'fields' => Field::all(),
            'adults' => Adults::all(),
            'designs' => Design::orderBy('name')->get(),
        ]);
    }
    public function processDelete($id)
    {
        try {
            $service = Service::findOrFail($id);

            DB::beginTransaction();
            $service->designs()->detach();
            $service->delete();
            DB::commit();
            $this->deleteImage($service->image);

            return redirect()
                ->route('admin.servicesDashboard')
                ->with('feedback.message', 'La película <b>' . e($service->title) . '</b> se eliminó con éxito.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
            
                ->route('services.confirmDelete', ['id' => $id])
                ->with('feedback.message', 'Ocurrio un error, intenta en unos minutos.');
        }
    }


    protected function uploadImage(Request $request): string
    {
        $image = $request->file('image');
        $imageName = date('YmdHis_') . Str::slug($request->input('title')) . "." . $image->guessExtension();

        $image->storeAs('imgs', $imageName);

        return $imageName;
    }

    protected function deleteImage(?string $file): void
    {
        if ($file !== null && Storage::has('imgs/' . $file)) {
            Storage::delete('imgs/' . $file);
        }
    }
}
