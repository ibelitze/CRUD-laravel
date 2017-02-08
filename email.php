<?php

Route::post('/sendmail', function(\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){

  $mailer->to($request->input('mail'))->send(new \App\Mail\Mymail($request->input('title')));
  return redirect()->back();
})->name('sendmail');


?>
