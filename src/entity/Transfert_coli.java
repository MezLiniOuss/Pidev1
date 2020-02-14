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
public class Transfert_coli {
    private int Id_transfert;
    private String Coli;
    private String Id_client;
    private String Id_transporteur;
    private String Raison;

    public Transfert_coli(int Id_transfert, String Coli, String Id_client, String Id_transporteur, String Raison) {
        this.Id_transfert = Id_transfert;
        this.Coli = Coli;
        this.Id_client = Id_client;
        this.Id_transporteur = Id_transporteur;
        this.Raison = Raison;
    }
  
 public Transfert_coli(int Id_transfert,  String Id_client, String Id_transporteur, String Coli) {
        this.Id_transfert = Id_transfert;
        this.Coli = Coli;
        this.Id_client = Id_client;
        this.Id_transporteur = Id_transporteur;
      
    }
  
    public int getId_transfert() {
        return Id_transfert;
    }

    public String getColi() {
        return Coli;
    }

    public String getId_client() {
        return Id_client;
    }

    public String getId_transporteur() {
        return Id_transporteur;
    }

    public String getRaison() {
        return Raison;
    }

    public void setId_transfert(int Id_transfert) {
        this.Id_transfert = Id_transfert;
    }

    public void setColi(String Coli) {
        this.Coli = Coli;
    }

    public void setId_client(String Id_client) {
        this.Id_client = Id_client;
    }

    public void setId_transporteur(String Id_transporteur) {
        this.Id_transporteur = Id_transporteur;
    }

    public void setRaison(String Raison) {
        this.Raison = Raison;
    }

    @Override
    public String toString() {
        return "Transfert_coli{" + "Id_transfert=" + Id_transfert + ", Coli=" + Coli + ", Id_client=" + Id_client + ", Id_transporteur=" + Id_transporteur + ", Raison=" + Raison + '}';
    }
      

}
