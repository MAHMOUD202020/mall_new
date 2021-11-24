<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bord =  Board::create([
           'floor' => 1,
           'hall' => 1,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 1,
           'hall' => 1,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 1,
           'hall' => 2,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 1,
           'hall' => 2,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 1,
           'hall' => 3,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 1,
           'hall' => 3,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 1,
           'hall' => 4,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 1,
           'hall' => 4,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }





      $bord =  Board::create([
           'floor' => 2,
           'hall' => 1,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 2,
           'hall' => 1,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 2,
           'hall' => 2,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 2,
           'hall' => 2,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 2,
           'hall' => 3,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 2,
           'hall' => 3,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 2,
           'hall' => 4,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 2,
           'hall' => 4,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }




        $bord =  Board::create([
           'floor' => 3,
           'hall' => 1,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 3,
           'hall' => 1,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 3,
           'hall' => 2,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 3,
           'hall' => 2,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 3,
           'hall' => 3,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 3,
           'hall' => 3,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }


        $bord =  Board::create([
           'floor' => 3,
           'hall' => 4,
           'monitor' => 'x'
       ]);


      for ($x = 1; $x <= 5; $x++){

          $bord->media()->create([
              'src' => "c$x.jpg",
              'type' => 'img',
              'sort' => '1',
              'loop' => 5,
          ]);
      }

      $bord =  Board::create([
           'floor' => 3,
           'hall' => 4,
           'monitor' => 'y'
       ]);


        for ($x = 1; $x <= 2; $x++){

            $bord->media()->create([
                'src' => "v$x.jpg",
                'type' => 'img',
                'sort' => '1',
                'loop' => 5,
            ]);
        }
    }
}
