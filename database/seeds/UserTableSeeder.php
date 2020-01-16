<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable();

        $murugo_user_list = explode(',',env('MURUGO_USER_SAMPLE'));
        $user_names = ['doctor prodoo',"cedric", "fred geek","michecl yes"];
        $i = 0;

        foreach ($murugo_user_list as $murugo_user_id) {
          
           $murugoUser = App\MurugoUser::create([
            'murugo_user_id' => $murugo_user_id
           ]);

           $user = App\User::create([
            'names' => $user_names[$i],
            'email' => Str::random(10).'@gmail.com',
            'avatar' => Str::random(10).'png'
           
           ]);

           $murugoUser->user_id = $user->id;
           $murugoUser->save();

           $i++;
        }
        
    }

    public function truncateTable()
    {
        \App\MurugoUser::truncate();
        \App\User::truncate(); 
    }
}