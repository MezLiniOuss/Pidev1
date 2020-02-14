/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

/**
 *
 * @author mahdi
 */
public class Demande_course {
  private String Id_course ;
  private String Id_client;
  private String Id_chauffeur;
  private String validation;
  private String raison;

    public Demande_course(String Id_course, String Id_client, String Id_chauffeur, String validation, String raison) {
        this.Id_course = Id_course;
        this.Id_client = Id_client;
        this.Id_chauffeur = Id_chauffeur;
        this.validation = validation;
        this.raison = raison;
    }

    public String getId_course() {
        return Id_course;
    }

    public String getId_client() {
        return Id_client;
    }

    public String getId_chauffeur() {
        return Id_chauffeur;
    }

    public String getValidation() {
        return validation;
    }

    public String getRaison() {
        return raison;
    }

    public void setId_course(String Id_course) {
        this.Id_course = Id_course;
    }

    public void setId_client(String Id_client) {
        this.Id_client = Id_client;
    }

    public void setId_chauffeur(String Id_chauffeur) {
        this.Id_chauffeur = Id_chauffeur;
    }

    public void setValidation(String validation) {
        this.validation = validation;
    }

    public void setRaison(String raison) {
        this.raison = raison;
    }

    @Override
    public String toString() {
        return "Demande_course{" + "Id_course=" + Id_course + ", Id_client=" + Id_client + ", Id_chauffeur=" + Id_chauffeur + ", validation=" + validation + ", raison=" + raison + '}';
    }

   
}
