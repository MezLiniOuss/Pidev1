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
public class Offre {
    private String idOffre;
    private String dateDeb,dateFin;
    private String code;

    public Offre() {
    }

    public Offre(String idOffre, String dateDeb, String dateFin, String code) {
        this.idOffre = idOffre;
        this.dateDeb = dateDeb;
        this.dateFin = dateFin;
        this.code = code;
    }

    public String getIdOffre() {
        return idOffre;
    }

    public String getDateDeb() {
        return dateDeb;
    }

    public String getDateFin() {
        return dateFin;
    }

    public String getCode() {
        return code;
    }

    public void setIdOffre(String idOffre) {
        this.idOffre = idOffre;
    }

    public void setDateDeb(String dateDeb) {
        this.dateDeb = dateDeb;
    }

    public void setDateFin(String dateFin) {
        this.dateFin = dateFin;
    }

    public void setCode(String code) {
        this.code = code;
    }

    @Override
    public String toString() {
        return "Offre{" + "idOffre=" + idOffre + ", dateDeb=" + dateDeb + ", dateFin=" + dateFin + ", code=" + code + '}';
    }
    
    
}
