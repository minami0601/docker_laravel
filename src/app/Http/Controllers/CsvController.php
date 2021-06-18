<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Csv;

class CsvController extends Controller
{
    public function csvExport(Request $request, Article $article, Category $category) {

        $response = new StreamedResponse(function () use ($article, $category) {
            
            $array_category = $category->getLists();
            
            $stream = fopen('php://output','w');
            $csv = new Csv();

            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // ヘッダー行を追加
            fputcsv($stream, $csv->csvHeader());
            
            $results = $csv->getCsvData($article);

            if (empty($results[0])) {
                    fputcsv($stream, [
                        'データが存在しませんでした。',
                    ]);
            } else {
                foreach ($results as $row) {
                    fputcsv($stream, $csv->csvRow($row, $array_category));
                }
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream'); 
        $response->headers->set('content-disposition', 'attachment; filename=お問い合わせ一覧.csv');

        return $response;
    }
}
