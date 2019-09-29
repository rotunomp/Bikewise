<?php
use App\Semester;
use Illuminate\Database\Seeder;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Semester::create([
            'year' => 2020,
            'season' => 'Fall',
            'startDate' => \Carbon\Carbon::parse('2020-08-25'),
            'endDate' => \Carbon\Carbon::parse('2020-12-11'),
        ]);
        \App\Semester::create([
            'year' => 2019,
            'season' => 'Fall',
            'startDate' => \Carbon\Carbon::parse('2019-08-25'),
            'endDate' => \Carbon\Carbon::parse('2019-12-11'),
        ]);
        \App\Semester::create([
            'year' => 2020,
            'season' => 'Spring',
            'startDate' => \Carbon\Carbon::parse('2020-01-25'),
            'endDate' => \Carbon\Carbon::parse('2020-05-14'),
        ]);
        \App\Semester::create([
            'year' => 2020,
            'season' => 'Spring',
            'startDate' => \Carbon\Carbon::parse('2020-01-25'),
            'endDate' => \Carbon\Carbon::parse('2020-05-14'),
        ]);
    }
}
