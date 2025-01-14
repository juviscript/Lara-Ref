<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Cabinet;
use App\Models\Drawer;
use App\Models\Folder;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function seedFakeDataToDB(): View
    {
        /**
         *  Factory Methods w/ Explanations (Woo!)
         * 
         *  Reference: https://laravel.com/docs/11.x/eloquent-factories#belongs-to-relationships
         * 
         *  Quick BUT Important Notes:
         *  
         *  ->create() : Permanently saves in DB.
         *  ->make() : Temporarily creates data. Good for testing.
         *  ->count(X) : Creates X amount of that model. Called before create() or make()
         *  
         *   Overriding Defaults  : Article Factory Default for Status is 1 ('Published'). Can override like so:
         *      ->create(["status_id" => 2]);
         *   
         *  Alternate Values (a.k.a Sequences) : Can alternate values for multi-creation calls like so:
         *      *Creates 5 model instances and every other instance will have either a status ID of 1 or 2.
         *      ->count(5)->state(new Sequence(
         *          ['status_id' => 1],
         *          ['status_id' => 2]
         *      ))
         *      ->create();  
         */


        // Creates 1 Cabinet, 3 Drawers associated with that cabinet, and 1 Folder for each Drawer.
        Cabinet::factory()
            ->has(
                Drawer::factory()
                    ->count(3)
                    ->has(
                        Folder::factory()
                            ->count(1)
                    )
            )
            ->count(1)
            ->create();

        // Creates 1 User and 3 Articles associated with that User.
        User::factory()
            ->has(
                Article::factory()
                    ->count(3)
                    ->sequence([
                        "folder_id" => Folder::all()->random()->id
                    ]),
                'articles'
            )
            ->create();

        return view('admin');
    }
}
