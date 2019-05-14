<?php

use App\Models\StudentList;
use Illuminate\Database\Seeder;

class ListStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('student_lists')->truncate();
        Schema::enableForeignKeyConstraints();

        $myfile = public_path('import/ips4.json');
        $handle = fopen($myfile, "r");
        $fileContent = fread($handle, filesize($myfile));
        $data = json_decode($fileContent);

        foreach ($data as $value) {
            $listStudent = new StudentList();
            $listStudent->fill([
                'name' => $value->name,
                'program' => $value->program,
                'jenis_kelamin' => $value->jenis_kelamin,
                'no_induk' => $value->no_induk,
            ]);
            $listStudent->save();
        }
    }
}
