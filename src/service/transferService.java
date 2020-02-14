/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import connectionDB.DataSource;
import entity.Demande_course;
import entity.Transfert_coli;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author mahdi
 */
public class transferService implements Itransfert_coli <Transfert_coli> {
private Connection cnx;
    private Statement st;
    private PreparedStatement pst;
    private ResultSet re;
      public transferService(){
        cnx=DataSource.getInstance().getCnx();

      }
   



    @Override

   
    public List<Transfert_coli> displayall() {
        String req="SELECT * FROM `colis`";
        List<Transfert_coli> list=new ArrayList<>();
    try {
        st=cnx.createStatement();
        re=st.executeQuery(req);
        while(re.next())
            {
                list.add(new Transfert_coli(re.getInt(1), re.getString(2),re.getString(3),re.getString(4),re.getString(5)));
            }
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
          return list;         
    }

    @Override
    public boolean Valide(Transfert_coli t) {
        String sql="UPDATE colis SET  reponse='Oui', vu='oui' WHERE id_colis='"+t.getId_transfert()+"'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(transferService.class.getName()).log(Level.SEVERE, null, ex);
       return false;       
    }          
    }

    @Override
    public boolean Refuse(Transfert_coli t) {
          String sql="UPDATE colis SET  raison='"+t.getRaison()+"', vu='oui' WHERE id_colis='"+t.getId_transfert()+"'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(transferService.class.getName()).log(Level.SEVERE, null, ex);
       return false;       
    }    
    }

    @Override
    public boolean delete(String id) {
            String req= "DELETE FROM colis WHERE id_colis = '"+id+"'";
    try {
        pst=cnx.prepareStatement(req);
            pst.executeUpdate();
            return  true;
    } catch (SQLException ex) {
        Logger.getLogger(transferService.class.getName()).log(Level.SEVERE, null, ex);
     return  false;
    }
    }

  
    

    @Override
    public void insert(Transfert_coli t) {
        String req="INSERT INTO colis (`id_colis`, `id_client`, `id_transporteur`, `colis`, `reponse`,`raison`,`vu`) VALUES('"+t.getId_transfert()+"','"+t.getId_client()+"','"+t.getId_transporteur()+"','"+t.getColi()+"','Non','"+t.getRaison()+"','Non')";  
    try {
        st=cnx.createStatement();
         st.executeUpdate(req);
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
    }

    @Override
    public boolean update(Transfert_coli t) {
         String sql="UPDATE course SET  raison='"+t.getRaison()+"',raison="+t.getRaison()+" WHERE id_course='"+t.getId_transfert()+"'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(transferService.class.getName()).log(Level.SEVERE, null, ex);
       return false;       
    }          
    }

    @Override
    public List<Transfert_coli> displayCustomer(Transfert_coli t) {
              String req="SELECT * FROM `colis` WHERE id_client='"+t.getId_client()+"'";
        List<Transfert_coli> list=new ArrayList<>();
    try {
        st=cnx.createStatement();
        re=st.executeQuery(req);
        while(re.next())
            {
                list.add(new Transfert_coli(re.getInt(1), re.getString(2),re.getString(3),re.getString(4),re.getString(5)));
            }
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
          return list;    
    }

    @Override
    public List<Transfert_coli> displayTransporter(Transfert_coli t) {
           String req="SELECT * FROM `colis` WHERE id_transporteur='"+t.getId_transporteur()+"'";
        List<Transfert_coli> list=new ArrayList<>();
    try {
        st=cnx.createStatement();
        re=st.executeQuery(req);
        while(re.next())
            {
                list.add(new Transfert_coli(re.getInt(1), re.getString(2),re.getString(3),re.getString(4),re.getString(5)));
            }
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
          return list; 
    }
    
}
