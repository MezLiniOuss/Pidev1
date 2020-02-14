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
public class location {
    private String idLocation,adresseDebut,addresseFin;
    private Date date ;

    public location(String idLocation, String adresseDebut, String addresseFin, Date date) {
        this.idLocation = idLocation;
        this.adresseDebut = adresseDebut;
        this.addresseFin = addresseFin;
        this.date = date;
    }

    public location() {
    }

    public location(String string) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    public location(String string, String string0, String string1, java.sql.Date date, String string2) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    public String getIdLocation() {
        return idLocation;
    }

    public String getAdresseDebut() {
        return adresseDebut;
    }

    public String getAddresseFin() {
        return addresseFin;
    }

    public Date getDate() {
        return date;
    }

    public void setIdLocation(String idLocation) {
        this.idLocation = idLocation;
    }

    public void setAdresseDebut(String adresseDebut) {
        this.adresseDebut = adresseDebut;
    }

    public void setAddresseFin(String addresseFin) {
        this.addresseFin = addresseFin;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    @Override
    public String toString() {
        return "location{" + "idLocation=" + idLocation + ", adresseDebut=" + adresseDebut + ", addresseFin=" + addresseFin + ", date=" + date + '}';
    }
    
    
}
