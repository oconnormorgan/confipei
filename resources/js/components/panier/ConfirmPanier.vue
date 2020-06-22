<template>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Confirmation de votre commande</v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step :complete="e1 > 2" step="2">Addresse de livraison et de facturation</v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step step="3">Paiement</v-stepper-step>
    </v-stepper-header>
    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card-title>Votre commande :</v-card-title>
        <v-card class="mb-2" color="grey lighten-1" v-for="(panier,key) in itemPanier" :key="key">
          <v-row class="ma-0 pa-0">
            <v-col class="ma-0 pa-0">
              <v-card-text>{{ panier.intitule }}</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>{{ panier.quantites }} pots</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>{{ panier.prix }} €</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>{{ panier.prix * panier.quantites }} € / Total</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>action</v-card-text>
            </v-col>
          </v-row>
        </v-card>

        <v-card class="mb-2" color="grey lighten-1">
          <v-row class="ma-0 pa-0 space-around">
            <v-col class="ma-0 pa-0">
              <v-card-text>TOTAL QUANTITES :</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>QUANTITES</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>TOTAL PRIX :</v-card-text>
            </v-col>
            <v-col class="ma-0 pa-0">
              <v-card-text>PRIX</v-card-text>
            </v-col>
          </v-row>
        </v-card>

        <v-btn color="primary" @click="confirmation">Continuer</v-btn>
        <v-btn text to="/panier">Annuler</v-btn>
      </v-stepper-content>
      <v-stepper-content step="2">
        <v-card class="mb-12" color="grey lighten-1">
          <v-row class="ma-0 pa-0">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.nom" label="Nom *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" label="Nom de jeune fille"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.prenom" label="Prenom *"></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>
          <v-row class="ma-0 pa-0">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.facturation.numero" label="N° *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field
                  type="string"
                  v-model="commande.facturation.adresse"
                  label="Adresse *"
                ></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field
                  type="string"
                  v-model="commande.facturation.codePostal"
                  label="Code postal *"
                ></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>
          <v-row class="ma-0 pa-0">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field
                  type="string"
                  v-model="commande.facturation.complementAdr"
                  label="Complement d'adresse"
                ></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.facturation.ville" label="Ville *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.facturation.pays" label="Pays *"></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>

          <v-row class="ma-0 pa-0">
            <v-col cols="6">
              <v-checkbox
                type="checkbox"
                label="Addresse de facturation = addresse de livraison"
                width="100%"
                v-model="enabled"
                hide-details
              ></v-checkbox>
            </v-col>
          </v-row>
          <v-row class="ma-0 pa-0" :hidden="enabled">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.nom" label="Nom *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" label="Nom de jeune fille"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.prenom" label="Prenom *"></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>
          <v-row class="ma-0 pa-0" :hidden="enabled">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.livraison.numero" label="N° *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.livraison.adresse" label="Adresse *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field
                  type="string"
                  v-model="commande.livraison.codePostal"
                  label="Code postal *"
                ></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>
          <v-row class="ma-0 pa-0" :hidden="enabled">
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field
                  type="string"
                  v-model="commande.livraison.complementAdr"
                  label="Complement d'adresse"
                ></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.livraison.ville" label="Ville *"></v-text-field>
              </v-card-text>
            </v-col>
            <v-col cols="12" sm="6" md="4" class="ma-0 pa-0">
              <v-card-text>
                <v-text-field type="string" v-model="commande.livraison.pays" label="Pays *"></v-text-field>
              </v-card-text>
            </v-col>
          </v-row>
          <v-row cols="12" class="ma-0 pa-0 justify-center">
            <small>* obligatoire</small>
          </v-row>
        </v-card>
        <v-btn color="primary" @click="saveInfo">Continuer</v-btn>
        <v-btn text @click="e1 = 1">Annuler</v-btn>
      </v-stepper-content>
      <v-stepper-content step="3">
        <v-card class="mb-12" color="grey lighten-1">
          <v-row justify="center">
            <v-expansion-panels accordion color="grey lighten-1" v-model="panel" multiple>
              <v-expansion-panel color="grey lighten-1">
                <v-expansion-panel-header color="grey lighten-1">
                  <v-card-title>Recapitulatif de votre commande</v-card-title>
                </v-expansion-panel-header>
                <v-expansion-panel-content color="grey lighten-1">
                  <v-expansion-panels accordion color="grey lighten-1">
                    <v-expansion-panel v-for="(panier,key) in itemPanier" :key="key">
                      <v-expansion-panel-header>
                        {{ panier.intitule }}
                        <v-spacer></v-spacer>
                        {{ panier.prix * panier.quantites }} € / Total
                      </v-expansion-panel-header>
                      <v-expansion-panel-content>{{ panier.quantites }} pots, {{ panier.prix}} € / u</v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-expansion-panels>
                  <v-card class="ma-0 pa-2 text-end">
                    <v-card-title>Total :</v-card-title>
                    <v-spacer></v-spacer>
                    <v-card-text>XX €</v-card-text>
                  </v-card>
                </v-expansion-panel-content>
              </v-expansion-panel>
              <v-expansion-panel color="grey lighten-1">
                <v-expansion-panel-header color="grey lighten-1">
                  <v-card-title>Paiement</v-card-title>
                </v-expansion-panel-header>
                <v-expansion-panel-content color="grey lighten-1">
                  <v-card class="justify-center">
                    <v-row class="pa-2 ma-0">
                      <v-col cols="12" sm="12" md="6">
                        <v-text-field label="Nom" v-model="name"></v-text-field>
                      </v-col>
                    </v-row>
                    <v-row class="pa-2 ma-0">
                      <v-col class="ma-0 pa-0">
                        <v-stripe-card
                          v-model="source"
                          :api-key="apiKey"
                        ></v-stripe-card>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-row>
        </v-card>
        <v-btn color="primary" v-on:click="submitPaymentMethod()">Continuer</v-btn>
        <v-btn text @click="e1 = 2">Annuler</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>

<script src="./ConfirmPanier.js"></script>