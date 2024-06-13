<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Auth\Register as BaseRegister;




class Register extends BaseRegister
{

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getUserNameFormComponent(),
                        $this->getSurNameFormComponent(),
                        $this->getSurName2FormComponent(),
                        $this->getPhoneFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getDesignerFormComponent(),
                        // $this->getLoginFormComponent(),
                        $this->getBrandFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }


    protected function getSurNameFormComponent(): Component
    {
        return TextInput::make('surname1')
            ->label('Surname')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }




    // protected function getLoginFormComponent(): Component
    // {
    //     return Toggle::make('log_in')
    //         ->label('Login')
    //         ->hidden()
    //         ->autofocus();
    // }

    protected function getUserNameFormComponent(): Component
    {
        return TextInput::make('username')
            ->label('Username')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getSurName2FormComponent(): Component
    {
        return TextInput::make('surname2')
            ->label('Second Surname')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }


    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->label('Phone')
            ->tel()
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getDesignerFormComponent(): Component
    {
        return Toggle::make('is_designer')
            ->label('Are you designer?')
            ->autofocus();
    }

    protected function getBrandFormComponent(): Component
    {
        return TextInput::make('brand')
            ->label('Your Brand,only if you are designer')
            ->autofocus();
    }

}
