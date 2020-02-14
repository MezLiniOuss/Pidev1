/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import entity.Demande_course;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.List;
import connectionDB.DataSource;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author mahdi
 */
public class DemandeService implements Idemande_course<Demande_course>{
private Connection cnx;
    private Statement st;
    private PreparedStatement pst;
    private ResultSet re;
      public DemandeService() {
    cnx=DataSource.getInstance().getCnx();
    }
    @Override
    public void insert(Demande_course t) {
     String req="INSERT INTO course (`id_course`, `id_client`, `id_chauffeur`, `reponse`, `raison`) VALUES('"+t.getId_course()+"','"+t.getId_client()+"','"+t.getId_chauffeur()+"','"+t.getRaison()+"','"+t.getValidation()+"')";  
    try {
        st=cnx.createStatement();
         st.executeUpdate(req);
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
           
    }

    @Override
    public boolean update(Demande_course t) {
     
   String sql="UPDATE course SET reponse="+t.getValidation()+", raison="+t.getRaison()+" WHERE id_course='"+t.getId_course()+"'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
       return false;       
    }          
     }

    @Override
    public boolean delete(String y) {
       String req= "DELETE FROM course WHERE id_course = '"+y+"'";
    try {
        pst=cnx.prepareStatement(req);
            pst.executeUpdate();
            return  true;
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
     return  false;
    }
     }

    @Override
    public List<Demande_course> displayall() {
        String req="SELECT * FROM `course`";
        List<Demande_course> list=new ArrayList<>();
    try {
        st=cnx.createStatement();
        re=st.executeQuery(req);
        while(re.next())
            {
                list.add(new Demande_course(re.getString(1), re.getString(2),re.getString(3),re.getString(4),re.getString(5)));
            }
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
    }
          return list;          
    }

    @Override
    public boolean Validation(Demande_course t) {
       String sql="UPDATE course SET reponse='oui' WHERE id_course='"+t.getId_course()+"'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
       return false;    
    } 
    }
    @Override
    public boolean Refuse(Demande_course t) {
       String sql="UPDATE course SET  raison='"+t.getRaison()+"'  WHERE id_course='"+t.getId_course()+"' and reponse='Non'";
   
    try {
        pst=cnx.prepareStatement(sql);
         pst.executeUpdate();
          return true;  
    } catch (SQLException ex) {
        Logger.getLogger(DemandeService.class.getName()).log(Level.SEVERE, null, ex);
       return false;    
    }  
    }
}
