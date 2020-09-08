<?php

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $str = file_get_contents('http://api.steampowered.com/ISteamApps/GetAppList/v0002/?format=json');
        $games = json_decode($str, true);
        $categories = \App\Category::all();

        if (!isset($games['applist'])) {
            return;
        }
        if (!isset($games['applist']['apps'])) {
            return;
        }

        foreach ($games['applist']['apps'] as $game) {

            $id = $game['appid'];
            $gameStr = file_get_contents('https://store.steampowered.com/api/appdetails?appids=' . $id);
            $gamesJson = json_decode($gameStr, true);

            if (!isset($gamesJson[$id])) {
                continue;
            }

            if (!isset($gamesJson[$id]['data'])) {
                continue;
            }

            $gameData = $gamesJson[$id]['data'];

            /** @var \App\Product $product */
            $product = \App\Product::firstOrCreate([
              'title' => $gameData['name'],
              'price' => $gameData['price_overview']['final'],
              'description' => $gameData['about_the_game']
            ]);

            $product->addMediaFromUrl($gameData['header_image'])
              ->toMediaCollection('cover');

            $product->categories()
              ->sync([$categories->random()->id]);
        }

    }
}
