<?php

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\News\Enums\NewsStatus;
use Modules\News\Repositories\NewsRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class NewsController extends Controller
{
    const NEWS_PER_PAGE = 8;

    public function __construct(protected NewsRepository $newsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $news = $this->newsRepository
            ->where(['status' => NewsStatus::ACTIVE->value])
            ->orderBy('created_at', 'desc')
            ->paginate(self::NEWS_PER_PAGE, ['id', 'url', 'title', 'short_description', 'created_at']);

        return response()->json(['news' => $news]);
    }

    /**
     *  News Options
     * @return JsonResponse
     */
    public function options(): JsonResponse
    {
        return response()->json(['statuses' => NewsStatus::cases()]);
    }


    /**
     * Show the specified resource.
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $item = $this->newsRepository->findByField('url', $slug)->first();

        if(!$item){
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['item' => $item]);
    }

    /**
     * Change News Status
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::enum(NewsStatus::class)]
        ]);

        $item = $this->newsRepository->update($data, $id);

        if(!$item){
            return response()->json(['message' => 'Item not updated'], 500);
        }

         return response()->json([
             'message' => 'Item updated successfully',
             'item'    => $item
         ]);
    }
}
