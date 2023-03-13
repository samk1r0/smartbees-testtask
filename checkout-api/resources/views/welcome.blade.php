<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Checkout Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <form class="container mx-auto py-4 flex">
            <section class="min-w-[300px] w-full mr-8">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto " name="person"></ion-icon> 
                    <p class="pl-4">1. TWOJE DANE</p>
                </div>
                <button class="py-3 w-full border-2 border-solid border-rose-500 rounded mt-4 text-rose-500"><b>Logowanie</b></button>
                <p class="text-center mt-2">Masz już konto? Kliknij żeby się zalogować.</p>
                <input class="mt-8 
                    relative
                    w-7
                    checked:before:content-[''] 
                    checked:before:absolute
                    checked:before:w-2
                    checked:before:h-3
                    checked:before:border-solid
                    checked:before:border-rose-500
                    checked:before:border-b-[3px]
                    checked:before:border-r-[3px]
                    checked:before:z-10
                    checked:before:rotate-45
                    checked:before:left-2
                    after:content-[''] 
                    after:absolute
                    after:w-6
                    after:h-6
                    after:border-solid
                    after:border-grey
                    after:-top-1
                    after:border
                  after:bg-white
                    after:rounded
                    after:z-9
                " type="checkbox" id="new_account" name="new_account" value="true">
                <label for="new_account"> Stwórz nowe konto</label>
                <input name="email" placeholder="Email *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <input name="password" placeholder="Hasło *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <input name="password_repeat" placeholder="Potwierdź hasło *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <input name="name" placeholder="Imię *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <input name="surname" placeholder="Nazwisko *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <select class="w-full p-1 rounded mt-6 border border-solid border-grey" name="country" id="country">
                    <option value="Poland">Polska</option>
                    <option value="Germany">Niemcy</option>
                    <option value="England">Anglia</option>
                    <option value="Sweden">Szwecja</option>
                </select>
                <input name="address" placeholder="Adres *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <div class="flex justify-between">
                    <input placeholder="Kod pocztowy *" class="mt-6 w-[49%] 2 p-1 rounded border-grey border-solid border" type="text">
                    <input placeholder="Miasto *" class="mt-6 w-[49%] p-1 rounded border-grey border-solid border" type="text">
                </div>
                <input name="phone" placeholder="Telefon *" class="mt-6 w-full p-1 rounded border-grey border-solid border" type="text">
                <input class="mt-8 
                    relative
                    w-7
                    checked:before:content-[''] 
                    checked:before:absolute
                    checked:before:w-2
                    checked:before:h-3
                    checked:before:border-solid
                    checked:before:border-rose-500
                    checked:before:border-b-[3px]
                    checked:before:border-r-[3px]
                    checked:before:z-10
                    checked:before:rotate-45
                    checked:before:left-2
                    after:content-[''] 
                    after:absolute
                    after:w-6
                    after:h-6
                    after:border-solid
                    after:border-grey
                    after:-top-1
                    after:border
                  after:bg-white
                    after:rounded
                    after:z-9
                " type="checkbox" id="new_account" name="secondary_address" value="true">
                <label for="new_account"> Dostawa pod inny adres</label>
            </section>

            <section class="min-w-[300px] w-full mr-8">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded mb-5">
                    <ion-icon class="my-auto" name="bus"></ion-icon>
                    <p class="pl-4">2. METODA DOSTAWY</p>
                </div>
                <div class="my-8 flex justify-between">
                    <div class="flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="in-post" name="delivery-type" value="InPost">
                        <img class=" ml-1 w-12 inline" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/InPost_logo.svg/2560px-InPost_logo.svg.png" alt="">
                        <label class="ml-3" for="in-post">InPost</label>
                    </div>
                    <b class="">10,99 zł</b>
                </div>
                <div class="my-8 flex justify-between">
                    <div class="flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="courier-dpd" name="delivery-type" value="courier-dpd">
                        <img class=" ml-1 w-12 inline"  src="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png" alt="">
                        <label class="ml-3" for="courier-dpd">Kurier DPD</label>
                    </div>
                    <b class="float-right">18,00 zł</b>
                </div>
                <div class="my-8 flex justify-between">
                    <div class="flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="pickup-dpd" name="delivery-type" value="pickup-dpd">
                        <img class=" ml-1 w-12 inline" src="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png" alt="">
                        <label class="ml-3" for="pickup-dpd">Kurier DPD pobranie</label>
                    </div>
                    <b class="float-right">22,00 zł</b>
                </div>
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto" name="card"></ion-icon>
                    <p class="pl-4">3. METODA PŁATNOŚCI</p>
                </div>
                <div class="my-6">
                    <div class=" my-6 flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="payU" name="payment_gateway" value="payU">
                        <img class=" ml-1 w-12 inline" src="https://poland.payu.com/wp-content/uploads/sites/14/2020/05/PAYU_LOGO_LIME-990x640.png" alt="">
                        <label class="ml-3" for="payU">PayU</label>
                    </div>
                    <div class="my-6 flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="payment-on-pickup" name="payment_gateway" value="payment-on-pickup">
                        <img class=" ml-1 w-12 inline" src="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png" alt="">
                        <label class="ml-3" for="payment-on-pickup">Płatność przy odbiorze</label>
                    </div>
                    <div class="my-2 flex items-center">
                        <input class="accent-pink-500 h-6 w-6" type="radio" id="banking-transfer" name="payment_gateway" value="banking-transfer">
                        <img class=" ml-1 w-12 inline" src="https://cdn-icons-png.flaticon.com/512/6404/6404655.png" alt="">
                        <label class="ml-3" for="banking-transfer">Przelew bankowy - zwykły</label>
                    </div>
                </div>
                <button class="py-3 w-full border-2 border-solid border-[#A89F8F] rounded mt-4 text-[#A89F8F]"><b>Dodaj kod rabatowy</b></button>
            </section>
            
            <section class="min-w-[300px] w-full">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto" name="list"></ion-icon>
                    <p class="pl-4">4. PODSUMOWANIE</p>
                </div>
                <div class="item my-5 flex relative">
                    <img class="inline" src="http://via.placeholder.com/100x50" alt="">
                    
                    <p class=" ml-1 inline"><b>Testowy Produkt</b>
                    <br>
                    Ilość: 1
                    </p>     
                    <p class="absolute right-0"><b>115,00 zł</b></p>            
                </div>
                <div class="border-t p-2 border-b border-dashed border-gray-500">
                    <div class="flex justify-between">
                        <p>Suma częściowa</p>
                        <p>115,00 zł</p>
                    </div>
                    <div class="flex justify-between">
                        <h1 class="text-2xl"><b>Łącznie</b></h1>
                        <h1 class="text-2xl"><b>115,00 zł</b></h1>
                    </div>
                </div>
                <textarea placeholder="Komentarz" name="comment" id="" rows="3" class="mt-4 w-full rounded p-2 border border-solid border-grey"></textarea>
                <input class="mt-8 
                    relative
                    w-7
                    checked:before:content-[''] 
                    checked:before:absolute
                    checked:before:w-2
                    checked:before:h-3
                    checked:before:border-solid
                    checked:before:border-rose-500
                    checked:before:border-b-[3px]
                    checked:before:border-r-[3px]
                    checked:before:z-10
                    checked:before:rotate-45
                    checked:before:left-2
                    after:content-[''] 
                    after:absolute
                    after:w-6
                    after:h-6
                    after:border-solid
                    after:border-grey
                    after:-top-1
                    after:border
                  after:bg-white
                    after:rounded
                    after:z-9
                " type="checkbox" id="newsletter_allow" name="newsletter_allow" value="true">
                <label for="newsletter_allow"> Zapisz się, aby otrzymywać newsletter</label>
                <input class="mt-8 
                    relative
                    w-7
                    checked:before:content-[''] 
                    checked:before:absolute
                    checked:before:w-2
                    checked:before:h-3
                    checked:before:border-solid
                    checked:before:border-rose-500
                    checked:before:border-b-[3px]
                    checked:before:border-r-[3px]
                    checked:before:z-10
                    checked:before:rotate-45
                    checked:before:left-2
                    after:content-[''] 
                    after:absolute
                    after:w-6
                    after:h-6
                    after:border-solid
                    after:border-grey
                    after:-top-1
                    after:border
                  after:bg-white
                    after:rounded
                    after:z-9
                " type="checkbox" id="agreement" name="agreement" value="true">
                <label for="agreement"> Zapoznałam/em się z <a class="text-blue-500" href="">Regulaminem</a> zakupów </label>
                <button class="mt-6 w-full rounded p-6 bg-rose-500 text-white"><b>POTWIERDŹ ZAKUP</b></button>
            </section>
        </form>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
