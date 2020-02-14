/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

import java.util.Date;

/**
 *
 * @author mahdi
 */
public class Car {
    private int immatricule,idPersonne;
    private String model,cateGrise,assurance,note;
    private Date dateMiseEnCirculation;
    private boolean etat;

    public Car(int immatricule, int idPersonne, String model, String cateGrise, String assurance, String note, Date dateMiseEnCirculation, boolean etat) {
        this.immatricule = immatricule;
        this.idPersonne = idPersonne;
        this.model = model;
        this.cateGrise = cateGrise;
        this.assurance = assurance;
        this.note = note;
        this.dateMiseEnCirculation = dateMiseEnCirculation;
        this.etat = etat;
    }

    public Car() {
    }

    public int getImmatricule() {
        return immatricule;
    }

    public int getIdPersonne() {
        return idPersonne;
    }

    public String getModel() {
        return model;
    }

    public String getCateGrise() {
        return cateGrise;
    }

    public String getAssurance() {
        return assurance;
    }

    public String getNote() {
        return note;
    }

    public Date getDateMiseEnCirculation() {
        return dateMiseEnCirculation;
    }

    public boolean isEtat() {
        return etat;
    }

    public void setImmatricule(int immatricule) {
        this.immatricule = immatricule;
    }

    public void setIdPersonne(int idPersonne) {
        this.idPersonne = idPersonne;
    }

    public void setModel(String model) {
        this.model = model;
    }

    public void setCateGrise(String cateGrise) {
        this.cateGrise = cateGrise;
    }

    public void setAssurance(String assurance) {
        this.assurance = assurance;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public void setDateMiseEnCirculation(Date dateMiseEnCirculation) {
        this.dateMiseEnCirculation = dateMiseEnCirculation;
    }

    public void setEtat(boolean etat) {
        this.etat = etat;
    }

    @Override
    public String toString() {
        return "Car{" + "immatricule=" + immatricule + ", idPersonne=" + idPersonne + ", model=" + model + ", cateGrise=" + cateGrise + ", assurance=" + assurance + ", note=" + note + ", dateMiseEnCirculation=" + dateMiseEnCirculation + ", etat=" + etat + '}';
    }
    
    
    
}
