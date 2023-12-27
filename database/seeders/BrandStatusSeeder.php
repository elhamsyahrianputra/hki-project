<?php

namespace Database\Seeders;

use App\Models\BrandStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        
        BrandStatus::create([
            'brand_id' => 1,
            'status' => 'accepted',
            'message' => 'Berkas sudah lengkap dan memenuhi semua syarat'
        ]);
        BrandStatus::create([
            'brand_id' => 1,
            'status' => 'revised',
            'message' => null
        ]);
        BrandStatus::create([
            'brand_id' => 1,
            'status' => 'revision',
            'message' => 'Tanda tangan tidak terlihat jelas atau gambar tanda tangan pecah (resolusi gambar kecil)'
        ]);
        BrandStatus::create([
            'brand_id' => 1,
            'status' => 'applied',
            'message' => null,
        ]);

        
        BrandStatus::create([
            'brand_id' => 2,
            'status' => 'rejected',
            'message' => 'Logo memiliki kempiran dengan merk lain, dan nama merk memiliki kesamaan hingga 80% dengan merk lain'
        ]);
        BrandStatus::create([
            'brand_id' => 2,
            'status' => 'revised',
            'message' => null,
        ]);
        BrandStatus::create([
            'brand_id' => 2,
            'status' => 'revision',
            'message' => 'Berkas atau gambar memiliki resolusi yang rendah atau gambar telihat pecah',
        ]);
        BrandStatus::create([
            'brand_id' => 2,
            'status' => 'applied',
            'message' => null,
        ]);

        BrandStatus::create([
            'brand_id' => 3,
            'status' => 'rejected',
            'message' => 'berkas yang dikirimkan tidak memenuhi syarat'
        ]);
        BrandStatus::create([
            'brand_id' => 3,
            'status' => 'applied',
            'message' => null,
        ]);

        BrandStatus::create([
            'brand_id' => 4,
            'status' => 'applied',
            'message' => null,
        ]);
        BrandStatus::create([
            'brand_id' => 5,
            'status' => 'applied',
            'message' => null,
        ]);
    }
}
