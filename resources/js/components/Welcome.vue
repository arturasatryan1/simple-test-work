<template>
    <v-app>
        <v-main>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-card-text>
                                <h3 class="green--text text-center">Congratulations, You have successfully registered</h3>
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
