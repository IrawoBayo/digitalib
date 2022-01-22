<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use App\Borrow;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\FpdfTpl;

class BookController extends Controller
{
    public function myBook()
    {
        $books = Borrow::where('status',1)->where('returned',0)->get();
        return view('user.books', compact('books'));
    }

    public function book($isbn)
    {
        $book = Book::where('ISBN',$isbn)->firstOrFail();
        return view('user.book', compact('book'));
    }

    // public function downloadBook($isbn)
    // {
    //     $book = Book::where('ISBN',$isbn)->firstOrFail();

    //     $pdf = new Fpdi();
    //     $pdf->AddPage();
    //     $pdf->setSourceFile('books/'.$book->upload);
    //     // import page 1
    //     $tplIdx = $pdf->importPage(1);
    //     // use the imported page and place it at point 10,10 with a width of 100 mm
    //     $pdf->useTemplate($tplIdx, 5, 5, 210);

    //     // now write some text above the imported page
    //     $pdf->SetFont('Helvetica');
    //     $pdf->SetTextColor(255, 0, 0);
    //     $pdf->SetXY(20, 270);
    //     $pdf->Write(0, 'This is just a simple text');

    //     $result = $pdf->Output();

    //     // $result->move('books/', $result);


    //     // $pdf = new FpdfTpl();
    //     // $pdf->AddPage();

    //     // $templateId = $pdf->beginTemplate();
    //     // $pdf->setFont('Helvetica');
    //     // $pdf->Text(10, 10, 'HEADING');
    //     // $pdf->endTemplate();

    //     // $pdf->useTemplate($templateId);

    //     // for ($i = 9; $i > 0; $i--) {
    //     //     $pdf->AddPage();
    //     //     $pdf->useTemplate($templateId);
    //     // }

    //     // $result = $pdf->Output();

    //     return $result;
    //     // return response()->download($result,'result.pdf');
    // }

    public function downloadBook($isbn)
    {
        $book = Book::where('ISBN',$isbn)->firstOrFail();
        // initiate FPDI
        $pdf = new FPDI();

        // get the page count
        $pageCount = $pdf->setSourceFile('books/'.$book->upload);
        // iterate through all pages
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            // import a page
            $templateId = $pdf->importPage($pageNo);
            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId);

            $size['w'] = 210;
            $size['h'] = 297;

            // create a page (landscape or portrait depending on the imported page size)
            if ($size['w'] > $size['h']) {
                $pdf->AddPage('L', array($size['w'], $size['h']));
            } else {
                $pdf->AddPage('P', array($size['w'], $size['h']));
            }

            // use the imported page
            $pdf->useTemplate($templateId);

            $pdf->SetFont('Helvetica');
            $pdf->SetXY(5, 260);
            $pdf->Write(4, 'Downloaded by library number: '.auth()->user()->libraryId);
        }

        // Output the new PDF
        $pdf->Output($book->title.'.pdf','D');
    }

    public function showReq()
    {
        $books = Book::latest()->get();
        $req = Borrow::where('user_id',auth()->user()->id)->first();
        return view('user.borrow', compact('books','req'));
    }

    public function postReq(Request $request)
    {
        $books = Borrow::where('user_id',auth()->id())->where('status',1)->where('returned',0)->count();
        $user = User::where('id',auth()->id())->first();
        $rating = $user->rating;
        if($rating == 1 && $books == 3){
            return back()->with('error','Maximum number of books reached for your current rating');
        }
        else if($rating == 2 && $books == 5){
            return back()->with('error','Maximum number of books reached for your current rating');
        }
        else if($rating == 3 && $books == 8){
            return back()->with('error','Maximum number of books reached for your current rating');
        }
        else if($rating == 4 && $books == 12){
            return back()->with('error','Maximum number of books reached for your current rating');
        }
        else if($rating == 5 && $books == 15){
            return back()->with('error','Maximum number of books reached for your current rating');
        }
        else{
            Borrow::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'book_id' => $request->book_id,
            ]);
        }

        return back()->with('success','Request Sent Successfully');
    }

    public function returnBook($id)
    {
        Borrow::find($id)->update([
            'returned' => 1
        ]);
        return back()->with('success','Book Returned Successfully');
    }
}
