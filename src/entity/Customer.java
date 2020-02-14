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
public class Customer {
    private int idCustomer,tel;
    private String nom,prenom,mail,photo,password;

    public Customer(int idCustomer, int tel, String nom, String prenom, String mail, String photo, String password) {
        this.idCustomer = idCustomer;
        this.tel = tel;
        this.nom = nom;
        this.prenom = prenom;
        this.mail = mail;
        this.photo = photo;
        this.password = password;
    }

    public Customer() {
    }

    public int getIdCustomer() {
        return idCustomer;
    }

    public int getTel() {
        return tel;
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

    public String getPhoto() {
        return photo;
    }

    public String getPassword() {
        return password;
    }

    public void setIdCustomer(int idCustomer) {
        this.idCustomer = idCustomer;
    }

    public void setTel(int tel) {
        this.tel = tel;
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

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    @Override
    public String toString() {
        return "Customer{" + "idCustomer=" + idCustomer + ", tel=" + tel + ", nom=" + nom + ", prenom=" + prenom + ", mail=" + mail + ", photo=" + photo + ", password=" + password + '}';
    }
    
    
}
