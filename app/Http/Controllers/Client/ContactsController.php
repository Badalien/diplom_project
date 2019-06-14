<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SiteConfigs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class ContactsController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $address = SiteConfigs::where(['type' => 'address'])->first();
        $email = SiteConfigs::where(['type' => 'email'])->first();
        $phone = SiteConfigs::where(['type' => 'phone'])->first();

        return view('contacts.show', [
            'address' => $address->value ?? 'не указан',
            'email' => $email->value ?? 'не указан',
            'phone' => $phone->value ?? 'не указан',
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $address = SiteConfigs::where(['type' => 'address'])->first();
        $email = SiteConfigs::where(['type' => 'email'])->first();
        $phone = SiteConfigs::where(['type' => 'phone'])->first();

        return view('contacts.edit', [
            'address' => $address->value ?? '',
            'email' => $email->value ?? '',
            'phone' => $phone->value ?? '',
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $elements = ['address', 'phone', 'email'];
        foreach ($elements as $element) {
            $record = SiteConfigs::where(['type' => $element])->first();
            if ($record) {
                $record->value = $request[$element] ?? '';
                $record->save();
            } else {
                SiteConfigs::create([
                    'type' => $element,
                    'value' => $request[$element] ?? ''
                ]);
            }
        }

        return redirect('/contacts');
    }
}
