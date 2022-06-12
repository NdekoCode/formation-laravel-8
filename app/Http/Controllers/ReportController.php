<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Mail\ReportMarkdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function report()
    {
        if (!Gate::allows('access-admin')) {
            abort('403', "Impossible de soummettre votre requete");
        }
        // $user = ['email' => "fontelias@gmail.com", 'name' => "Elias Fon", 'date' => date('l jS \of F Y')];
        // La methode send prend en parametre notre maillable créer pour envoyer un mail particulier avec une vue particulier
        // Mail::to($user['email'])->send(new ReportMail($user));
        Mail::to('fontelias@yahoo.com')->send(new ReportMarkdown);
    }
}
