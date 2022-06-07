<?php
namespace Database\Factories;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(2),
            'description' => $this->faker->paragraph(15),
            'category_id' => mt_rand(1,3)
        ];
    }
}