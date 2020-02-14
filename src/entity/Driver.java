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
public class Driver {
    private int idDriver,cin,permis;
    private String nom,prenom,mail,password,photo,addresse,statut,note;

    public Driver(int idDriver, int cin, int permis, String nom, String prenom, String mail, String password, String photo, String addresse, String statut, String note) {
        this.idDriver = idDriver;
        this.cin = cin;
        this.permis = permis;
        this.nom = nom;
        this.prenom = prenom;
        this.mail = mail;
        this.password = password;
        this.photo = photo;
        this.addresse = addresse;
        this.statut = statut;
        this.note = note;
    }

    public Driver() {
    }

    public int getIdDriver() {
        return idDriver;
    }

    public int getCin() {
        return cin;
    }

    public int getPermis() {
        return permis;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getMail() {
        return mail;
    }

    public String getPassword() {
        return password;
    }

    public String getPhoto() {
        return photo;
    }

    public String getAddresse() {
        return addresse;
    }

    public String getStatut() {
        return statut;
    }

    public String getNote() {
        return note;
    }

    public void setIdDriver(int idDriver) {
        this.idDriver = idDriver;
    }

    public void setCin(int cin) {
        this.cin = cin;
    }

    public void setPermis(int permis) {
        this.permis = permis;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    public void setAddresse(String addresse) {
        this.addresse = addresse;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    public void setNote(String note) {
        this.note = note;
    }

    @Override
    public String toString() {
        return "Driver{" + "idDriver=" + idDriver + ", cin=" + cin + ", permis=" + permis + ", nom=" + nom + ", prenom=" + prenom + ", mail=" + mail + ", password=" + password + ", photo=" + photo + ", addresse=" + addresse + ", statut=" + statut + ", note=" + note + '}';
    }
    
}
