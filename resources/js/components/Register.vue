<template>
    <v-app>
        <v-main>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar dark color="primary">
                                <v-toolbar-title> Register form</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
                                <form action="/register" method="POST">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <v-text-field
                                        v-model="fullName"
                                        name="full_name"
                                        label="Full Name"
                                        type="text"
                                    ></v-text-field>
                                    <v-select
                                        v-model="country"
                                        name="country"
                                        :items="countries"
                                        label="Country"
                                        item-text="name"
                                    >
                                        <template v-slot:prepend-inner v-if="selectedCountry">
                                            <flag :iso="selectedCountry.iso" class="mt-1"/>
                                        </template>
                                        <template v-slot:item="slotProps">
                                            <flag :iso="slotProps.item.iso" class="mr-1"/>
                                            <span>{{slotProps.item.name}}</span>
                                        </template>
                                    </v-select>
                                    <v-text-field
                                        v-model="phoneNumber"
                                        name="phone_number"
                                        label="Phone Number"
                                        type="text"
                                        v-mask="selectedCountry ? selectedCountry.mask : '(###)###-####'"
                                        required
                                    >
                                        <template v-slot:prepend-inner v-if="selectedCountry">
                                            <span class="blue--text mt-1">{{selectedCountry.idd}}</span>
                                        </template>
                                    </v-text-field>
                                    <v-text-field
                                        v-model="email"
                                        name="email"
                                        label="Email"
                                        type="email"
                                        required
                                    ></v-text-field>
                                    <v-btn type="submit" class="mt-4" color="primary" value="register">Register</v-btn>
                                </form>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
    import countries from '../data/json/countries';

    export default {
        name: "Register",
        data() {
            return {
                fullName: "",
                email: "",
                country: "Brunei",
                phoneNumber: "",
                countries: countries,
                selectedCountry: {
                    "name": "Brunei",
                    "flag": "🇧🇳",
                    "idd": "+673",
                    "iso": "BN",
                    "mask": "###-####"
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            };
        },

        watch: {
            country() {
                this.selectedCountry = this.countries.find((item) => item.name === this.country);
                this.phoneNumber = '';
            }
        }
    };
</script>
