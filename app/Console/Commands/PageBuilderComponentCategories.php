<?php

namespace App\Console\Commands;

use App\Models\Superadmin\PageBuilder\PageBuilderComponentCategory;
use Illuminate\Console\Command;

class PageBuilderComponentCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:page-builder-component-categories";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command description";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = [
            "Forms",
            "Teams",
            "Features",
            "Articles",
            "Contact Sections",
            "Feature Sections",
            "Description Lists",
        ];

        foreach ($categories as $categoryName) {
            PageBuilderComponentCategory::factory()->create([
                "name" => $categoryName,
            ]);
        }

        $this->info(
            "Seeded successfully, new Components Categories for production."
        );
    }
}
