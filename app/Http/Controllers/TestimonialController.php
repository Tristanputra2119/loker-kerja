<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function storeTestimonial(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'message' => 'required|string',
        ]);

        $testimonial = new Testimonial();
        $testimonial->message = $request->message;
        $testimonial->job_id = $request->job_id;
        $testimonial->user_id = Auth::id(); // Bisa menggunakan user_id jika kamu ingin menyimpan ID pengguna
        $testimonial->save();

        return redirect()->route('job.show', ['job' => $request->job_id])->with('success', 'Testimoni berhasil dikirim!');
    }
}
