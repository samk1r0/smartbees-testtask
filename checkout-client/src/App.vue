<script setup>
import Checkbox from './components/Checkbox.vue'
import TextInput from './components/TextInput.vue'
import DeliveryMethod from './components/DeliveryMethod.vue'
import PaymentMethod from './components/PaymentMethod.vue'
</script>

<template>
  <form v-on:submit.prevent="createOrder" class="container mx-auto py-4 px-4 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <div v-if="show_login_modal" class="flex justify-center fixed w-full bg-black/[.5] left-0 top-0 right-0 bottom-0 z-20">
                <div class="fixed rounded bg-white mt-32 w-[18rem] min-[460px]:w-[20rem] p-4">
                    <span @click="manipulateLoginModal" class="cursor-pointer absolute text-3xl top-[-12px] right-0">&#215;</span>
                    <p for="">Login</p>
                    <TextInput name="" placeholder="" type="text" />
                    <p class="mt-8" for="">Hasło</p>
                    <TextInput name="" placeholder="" type="password" />
                    <button class="py-3 w-full border-2 border-solid border-rose-500 rounded mt-4 text-rose-500"><b>Zaloguj się</b></button>
                </div>
            </div>
            <div v-if="show_success_modal" class="flex justify-center fixed w-full bg-black/[.5] left-0 top-0 right-0 bottom-0 z-20">
                <div class="fixed rounded bg-gradient-to-r from-green-400 to-blue-500 mt-32 w-[18rem] min-[460px]:w-[24rem] p-4">
                    <span @click="show_success_modal=!show_success_modal" class="cursor-pointer absolute text-3xl top-[-12px] right-0">&#215;</span>
                    <h2 class="text-white text-center">Dziękujemy za zaufanie.</h2>
                    <h2 class="text-white text-center">Twój numer zamówienia:</h2>
                    <h2 class="text-white text-center">{{ order.id }}</h2>
                </div>
            </div>
            <section class="w-full">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto" name="person"></ion-icon> 
                    <p class="pl-4">1. TWOJE DANE</p>
                </div>
                <a @click="manipulateLoginModal" class="block text-center cursor-pointer py-3 w-full border-2 border-solid border-rose-500 rounded mt-4 text-rose-500"><b>Logowanie</b></a>
                <p class="text-center mt-2">Masz już konto? Kliknij żeby się zalogować.</p>
                <Checkbox name="new_account" v-on:change="new_account=!new_account" ref="new_account" />
                <label class="cursor-pointer" for="new_account">Stwórz nowe konto</label>
                <TextInput name="email" placeholder="Email *" type="email"/>
                <div v-if="new_account">
                    <TextInput @emit-result="inputEntered" name="password" placeholder="Hasło *" type="password" />
                    <TextInput @emit-result="inputEntered" name="password_confirmation" placeholder="Potwierdź hasło *" type="password" />
                    <h1 class="bg-red">{{ password_error }}</h1>
                </div>
                <TextInput name="name" placeholder="Imię *" type="text"/>
                <TextInput name="surname" placeholder="Nazwisko *" type="text"/>
                <select class="w-full p-1 rounded mt-6 border border-solid border-grey" name="country" id="country" required>
                    <option value="">Wybierz kraj</option>
                    <option value="Poland">Polska</option>
                    <option value="Germany">Niemcy</option>
                    <option value="England">Anglia</option>
                    <option value="Sweden">Szwecja</option>
                </select>
                <TextInput name="address" placeholder="Adres *" type="text" />
                <div class="flex justify-between">
                    <input required name="postal_index" placeholder="Kod pocztowy *" class="mt-6 w-[49%] 2 p-1 rounded border-grey border-solid border" type="text">
                    <input required name="city" placeholder="Miasto *" class="mt-6 w-[49%] p-1 rounded border-grey border-solid border" type="text">
                </div>
                <TextInput name="phone" placeholder="Telefon *" type="tel" />
                <Checkbox v-on:change="secondary_address=!secondary_address" name="secondary_address"/>
                <label class="cursor-pointer" for="secondary_address"> Dostawa pod inny adres</label>

                <div v-if="secondary_address">
                    <select v-model="additional_country" class="w-full p-1 rounded mt-6 border border-solid border-grey" name="additional_country" id="additional_country">
                        <option value="">Wybierz kraj</option>
                        <option value="Poland">Polska</option>
                        <option value="Germany">Niemcy</option>
                        <option value="England">Anglia</option>
                        <option value="Sweden">Szwecja</option>
                    </select>
                    <TextInput @emit-result="inputEntered" name="additional_address" placeholder="Adres *" type="text" />
                    <div class="flex justify-between">
                        <input v-model="additional_postal_code" name="additional_postal_code" placeholder="Kod pocztowy *" class="mt-6 w-[49%] 2 p-1 rounded border-grey border-solid border" type="text">
                        <input v-model="additional_city" name="additional_city" placeholder="Miasto *" class="mt-6 w-[49%] p-1 rounded border-grey border-solid border" type="text">
                    </div>
                </div>
            </section>

            <section class=" w-full">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded mb-5">
                    <ion-icon class="my-auto" name="bus"></ion-icon>
                    <p class="pl-4">2. METODA DOSTAWY</p>
                </div>
                <DeliveryMethod @emit-result="deliveryResult" title="InPost" price="10,99" name="in-post" image="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/InPost_logo.svg/2560px-InPost_logo.svg.png"/>
                <DeliveryMethod @emit-result="deliveryResult" title="Kurier DPD" price="18,00" name="courier-dpd" image="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png"/>
                <DeliveryMethod @emit-result="deliveryResult" title="Kurier DPD pobranie" price="22,00" name="pickup-dpd" image="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png"/>
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto" name="card"></ion-icon>
                    <p class="pl-4">3. METODA PŁATNOŚCI</p>
                </div>
                <div class="my-6">
                  <PaymentMethod v-if="payUAvailable" title="PayU" id="payU" image="https://poland.payu.com/wp-content/uploads/sites/14/2020/05/PAYU_LOGO_LIME-990x640.png"/>
                  <PaymentMethod v-if="cashAvailable" title="Płatność przy odbiorze" id="payment-on-pickup" image="https://upload.wikimedia.org/wikipedia/commons/4/4c/DPD_logo%28red%292015.png"/>
                  <PaymentMethod v-if="bankTransferAvailable" title="Przelew bankowy - zwykły" id="banking-transfer" image="https://cdn-icons-png.flaticon.com/512/6404/6404655.png"/>
                </div>
                <a @click="showPromocodeField=!showPromocodeField" class="block text-center cursor-pointer py-3 w-full border-2 border-solid border-[#A89F8F] rounded mt-4 text-[#A89F8F]"><b><span v-if="!showPromocodeField">Dodaj</span><span v-else>Usuń</span> kod rabatowy</b></a>
                <TextInput v-if="showPromocodeField" name="promocode" type="text" placeholder="Tu możesz wpisać kod rabatowy"/>
            </section>
            
            <section class=" w-full">
                <div class="flex bg-section-title bg-[#A89F8F] text-white p-4 rounded">
                    <ion-icon class="my-auto" name="list"></ion-icon>
                    <p class="pl-4">4. PODSUMOWANIE</p>
                </div>
                <div class="item my-5 flex relative">
                    <img class="inline object-contain" src="http://via.placeholder.com/100x50" alt="">
                    <p class="w-1 ml-1 inline min-[340px]:w-32 min-[472px]:w-64"><b>Testowy Produkt</b>
                    <br>
                    Ilość: 1
                    </p>     
                    <p class="absolute right-0"><b>115,00 zł</b></p>            
                </div>
                <div v-if="deliveryType" class="flex items-center justify-between">
                    <p class="p-2">Typ Dostawy: <span>{{ deliveryType }}</span></p>
                    <b>{{ deliveryTypePrice }} zł</b>
                </div>
                <div class="border-t p-2 border-b border-dashed border-gray-500">
                    <div class="flex justify-between">
                        <p>Suma częściowa</p>
                        <p>115,00 zł</p>
                    </div>
                    <div class="flex justify-between">
                        <h1 class="text-2xl"><b>Łącznie</b></h1>
                        <h1 class="text-2xl"><b>{{ summary }} zł</b></h1>
                    </div>
                </div>
                <textarea placeholder="Komentarz" name="comment" id="" rows="3" class="mt-4 w-full rounded p-2 border border-solid border-grey"></textarea>
                <Checkbox name="newsletter_allow"/>
                <label class="cursor-pointer" for="newsletter_allow"> Zapisz się, aby otrzymywać newsletter</label> <br>
                <Checkbox name="agreement"/>
                <label class="cursor-pointer" for="agreement"> Zapoznałam/em się z <a class="text-blue-500" href="">Regulaminem</a> zakupów </label>
                <button type="submit" class="mt-6 w-full rounded p-6 bg-rose-500 text-white"><b>POTWIERDŹ ZAKUP</b></button>
            </section>
        </form>
</template>

<script>
import axios from 'axios'
import { reactive } from 'vue';

    export default {
        data() {
            return{
                new_account:false,
                secondary_address:false,
                show_login_modal:false,
                payUAvailable:true,
                cashAvailable:true,
                bankTransferAvailable:true,
                summaryWihoutDelivery: 115.00,
                summary: '115,00',
                inpostPrice: 10.99,
                curierDpdPrice: 18.00,
                collectDpdPrice: 22.00,
                deliveryType:'',
                deliveryTypePrice:'',
                show_success_modal:false,
                order_customer_id:'',
                password:'',
                password_confirmation:'',
                password_error:'',
                showPromocodeField:'',
                additional_address:'',
                additional_country:'',
                additional_city:'',
                additional_postal_code:'',
                order : reactive({
                    id:''
                })
            }
        }, 
        methods:{
            createOrder(submitEvent){
                const formData = submitEvent.target;
                if(this.password!=this.password_confirmation){
                    this.password_error = "Wprowadzone hasła nie zgadzają się";
                    return
                }
                else{
                    this.password_error='';
                }

                const form = reactive({
                    email: formData.email.value,
                    name: formData.name.value,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    new_account: formData.new_account.checked,
                    surname: formData.surname.value,
                    country: formData.country.value,
                    address: formData.address.value,
                    postal_index: formData.postal_index.value,
                    city: formData.city.value,
                    phone: formData.phone.value,
                    payment_method: formData.payment_gateway.value,
                    delivery_method: formData.delivery_type.value,
                    newsletter_agreement: formData.newsletter_allow.checked,
                    terms_and_services_agreement: formData.agreement.checked,
                    comment: formData.comment.value,
                    summary: this.summary.replace(',', '.'),
                    product_id: 1,
                    products_quantity: 1,
                    additional_address:this.additional_address,
                    additional_country:this.additional_country,
                    additional_city:this.additional_city,
                    additional_postal_code:this.additional_postal_code,
                });
                axios.defaults.baseURL = 'http://localhost:8000'
                axios.post('/api/order', form).then(res=>{
                    this.order.id = res.data
                    this.show_success_modal = true;
                });
            },
            manipulateLoginModal(){
                this.show_login_modal = !this.show_login_modal
            },
            inputEntered(res){
                if(Array.isArray(res)){
                    res[1]=='password' ? this.password=res[0] : this.password_confirmation=res[0];
                }
                else{
                    this.additional_address = res;
                }
            },
            deliveryResult(res) {
                switch (res){
                    case 'InPost':
                        this.payUAvailable = true;
                        this.cashAvailable = true;
                        this.bankTransferAvailable = true;
                        this.summary = (this.inpostPrice + this.summaryWihoutDelivery).toFixed(2);
                        this.deliveryTypePrice=this.inpostPrice.toFixed(2).replace('.', ',');
                        break;
                    case 'Kurier DPD':
                        this.payUAvailable = true;
                        this.cashAvailable = true;
                        this.bankTransferAvailable = false;
                        this.summary = (this.curierDpdPrice + this.summaryWihoutDelivery).toFixed(2);
                        this.deliveryTypePrice=this.curierDpdPrice.toFixed(2).replace('.', ',');
                        break;
                    case 'Kurier DPD pobranie':
                        this.payUAvailable = false;
                        this.cashAvailable = true;
                        this.bankTransferAvailable = false;
                        this.summary = (this.collectDpdPrice + this.summaryWihoutDelivery).toFixed(2);
                        this.deliveryTypePrice=this.collectDpdPrice.toFixed(2).replace('.', ',');
                        break;
                }
                this.summary = this.summary.replace('.', ',')
                this.deliveryType = res;
            }
        }
    }
</script>