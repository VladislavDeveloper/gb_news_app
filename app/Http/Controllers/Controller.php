<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function fetchNews(string $id = null): array
    {
        $news = [
            [
                'id' => 1,
                'author' => fake()->userName(),
                'title' => 'Получено первое рентгеновское изображение атома',
                'description' => 'Ученые смогли получить первое рентгеновское изображение отдельного атома',
                'category_id' => 1,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 2,
                'author' => fake()->userName(),
                'title' => 'Мошенники похитили более 560 доменов',
                'description' => 'BI.ZONE: мошенники похитили более 560 доменов и превратили их в фишинговые сайты',
                'category_id' => 1,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 3,
                'author' => fake()->userName(),
                'title' => 'РЖД представила собственного виртуального помощника «Валера»',
                'description' => 'РЖД представила собственного виртуального помощника «Валера»',
                'category_id' => 1,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 4,
                'author' => fake()->userName(),
                'title' => '«МегаФон» и Банки.ру представят совместный проект',
                'description' => '«МегаФон» и Банки.ру представят совместный проект',
                'category_id' => 1,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 5,
                'author' => fake()->userName(),
                'title' => 'Экономика Рунета за 2022 год выросла на 29%',
                'description' => 'Российская ассоциация электронных коммуникаций (РАЭК) 
                    представила итоги ежегодного исследования «Экономика Рунета», 
                    согласно которым вклад интернет-экономики в экономику России вырос на 29% до 12,2 трлн рублей 
                    по сравнению с 2021 годом, сообщает пресс-служба РАЭК.',
                'category_id' => 2,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 6,
                'author' => fake()->userName(),
                'title' => 'Страны ОПЕК+ договорились о корректировке добычи в 2024 году',
                'description' => 'Общий целевой уровень добычи нефти стран ОПЕК+ на следующий год составит 40,46 млн барр. в сутки. 
                    Россия продлит добровольное сокращение до конца 2024 года',
                'category_id' => 2,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 7,
                'author' => fake()->userName(),
                'title' => '«Газпром» на неделю остановит «Турецкий поток» на плановое обслуживание',
                'description' => 'Газопровод «Турецкий поток» закроют на плановое техническое обслуживание. 
                    Об этом говорится в сообщении, опубликованном в телеграм-канале «Газпрома».',
                'category_id' => 2,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 8,
                'author' => fake()->userName(),
                'title' => 'В Туле открывается юбилейная выставка заслуженного художника РФ Ивана Щербино',
                'description' => 'Она открывается 7 июня в 16. 00 в Выставочном зале в Туле, на Красноармейском пр., 16, и будет работать до 16 июля. ',
                'category_id' => 4,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 9,
                'author' => fake()->userName(),
                'title' => 'Стартовала регистрация на фестиваль молодого искусства "Таврида.АРТ"',
                'description' => 'Юбилейный фестиваль молодого искусства «Таврида.АРТ» пройдёт с 17 по 21 августа в бухте под крымским городом Судак. ',
                'category_id' => 4,
                'created_at' => fake()->date(),
            ],
            [
                'id' => 10,
                'author' => fake()->userName(),
                'title' => 'Бывший сотрудник Blizzard о трудностях разработки игр: "Раньше было проще"',
                'description' => 'В настоящее время, и особенно в этом году, все большее количество игр не отвечает техническим требованиям игроков или требованиям производительности. ',
                'category_id' => 5,
                'created_at' => fake()->date(),
            ],

        ];

        if(!$id == null){

            $data = [];

            foreach($news as $element){
                if($element['id'] == $id){
                    $data[] = $element;
                }
            }

            return $data;

        }

        return $news;

    }

    protected function featchNewsByCategory(string $category_id = null): array
    {
        $news = $this->fetchNews();

        $data = [];

        foreach($news as $element){
            if($element['category_id'] == $category_id){
                $data[] = $element;
            }
        }

        return $data;
    }

    protected function fetchCategories(string $id = null): array
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Наука и техника'
            ],
            [
                'id' => 2,
                'name' => 'Экономика'
            ],
            [
                'id' => 3,
                'name' => 'Политика'
            ],
            [
                'id' => 4,
                'name' => 'Искусство'
            ],
            [
                'id' => 5,
                'name' => 'Развлечения'
            ],
        ];

        if(!$id == null){

            foreach ($categories as $category) {
                if($category['id'] == $id){
                    return $category;
                } 
            }
        }

        return $categories;
    }
}
