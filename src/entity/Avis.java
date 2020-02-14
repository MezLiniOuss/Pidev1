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
public class Avis {
    private int idAvis,idPersonne;
    private String Conten ;
    private Date date ;

    public Avis() {
    }

    public Avis(int idAvis, int idPersonne, String Conten, Date date) {
        this.idAvis = idAvis;
        this.idPersonne = idPersonne;
        this.Conten = Conten;
        this.date = date;
    }

    public int getIdAvis() {
        return idAvis;
    }

    public int getIdPersonne() {
        return idPersonne;
    }

    public String getConten() {
        return Conten;
    }

    public Date getDate() {
        return date;
    }

    public void setIdAvis(int idAvis) {
        this.idAvis = idAvis;
    }

    public void setIdPersonne(int idPersonne) {
        this.idPersonne = idPersonne;
    }

    public void setConten(String Conten) {
        this.Conten = Conten;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    @Override
    public String toString() {
        return "Avis{" + "idAvis=" + idAvis + ", idPersonne=" + idPersonne + ", Conten=" + Conten + ", date=" + date + '}';
    }
    
    
}
