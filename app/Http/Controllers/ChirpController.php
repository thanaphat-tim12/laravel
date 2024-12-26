<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller//สร้างคลาส ChirpController ซึ่งสืบทอดมาจาก Controller
{


    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
        ]);
    }
    //index ใช้สำหรับแสดงรายการ Chirps:
    //Chirp::with('user:id,name') โหลดข้อมูลผู้ใช้ที่เกี่ยวข้องเฉพาะ id และ name
    //latest() เรียงลำดับตามข้อมูลล่าสุด
    //get() ดึงข้อมูลทั้งหมด
    //ส่งข้อมูลนี้ไปที่ View Chirps/Index ผ่าน Inertia.js

    public function create()//create มักใช้สำหรับแสดงฟอร์มสร้างข้อมูลใหม่
    {
        //
    }



    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }
//store ใช้สำหรับบันทึกข้อมูลใหม่:
//รับ Request จากผู้ใช้
//ตรวจสอบข้อมูล (message ต้องเป็นสตริงและยาวไม่เกิน 255 ตัวอักษร)
//ใช้ผู้ใช้งานปัจจุบัน ($request->user()) เพื่อสร้าง chirp ใหม่
//เปลี่ยนเส้นทางกลับไปยังหน้า chirps.index

    public function show(Chirp $chirp)
    {
        //
    }
//show มักใช้สำหรับแสดงข้อมูลเฉพาะของ chirp

    public function edit(Chirp $chirp)
    {
        //
    }
//edit มักใช้สำหรับแสดงฟอร์มแก้ไข chirp ตัวหนึ่ง

    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
//update ใช้สำหรับอัปเดตข้อมูล chirp:
//ใช้ Gate::authorize เพื่อตรวจสอบสิทธิ์การแก้ไข
//ตรวจสอบข้อมูล (message ต้องเป็นสตริงและยาวไม่เกิน 255 ตัวอักษร)
//อัปเดตข้อมูลในฐานข้อมูลด้วย $chirp->update($validated)
//เปลี่ยนเส้นทางกลับไปยังหน้า chirps.index
        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    public function destroy(Chirp $chirp): RedirectResponse
    {
        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }

}
//destroy ใช้สำหรับลบข้อมูล chirp:
//ใช้ Gate::authorize เพื่อตรวจสอบสิทธิ์การลบ
//ลบ chirp จากฐานข้อมูลด้วย $chirp->delete()
//เปลี่ยนเส้นทางกลับไปยังหน้า chirps.index
