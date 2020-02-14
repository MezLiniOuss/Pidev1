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
public class Reclamation {
    private int idReclamation,idPersonne;
    private Date dateReclamation ;
    private String contenue,note;
    private boolean etat;

    public Reclamation() {
    }

    public Reclamation(int idReclamation, int idPersonne, Date dateReclamation, String contenue, String note, boolean etat) {
        this.idReclamation = idReclamation;
        this.idPersonne = idPersonne;
        this.dateReclamation = dateReclamation;
        this.contenue = contenue;
        this.note = note;
        this.etat = etat;
    }

    public int getIdReclamation() {
        return idReclamation;
    }

    public int getIdPersonne() {
        return idPersonne;
    }

    public Date getDateReclamation() {
        return dateReclamation;
    }

    public String getContenue() {
        return contenue;
    }

    public String getNote() {
        return note;
    }

    public boolean isEtat() {
        return etat;
    }

    public void setIdReclamation(int idReclamation) {
        this.idReclamation = idReclamation;
    }

    public void setIdPersonne(int idPersonne) {
        this.idPersonne = idPersonne;
    }

    public void setDateReclamation(Date dateReclamation) {
        this.dateReclamation = dateReclamation;
    }

    public void setContenue(String contenue) {
        this.contenue = contenue;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public void setEtat(boolean etat) {
        this.etat = etat;
    }

    @Override
    public String toString() {
        return "Reclamation{" + "idReclamation=" + idReclamation + ", idPersonne=" + idPersonne + ", dateReclamation=" + dateReclamation + ", contenue=" + contenue + ", note=" + note + ", etat=" + etat + '}';
    }
    
    
}
