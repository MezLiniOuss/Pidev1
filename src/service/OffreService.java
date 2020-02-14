/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import entity.Offre;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
//import javax.activation.DataSource;
import connectionDB.DataSource; 

/**
 *
 * @author LENOVO
 */
public class OffreService implements IOffre<Offre>{
private Connection cnx;
    private Statement st;
    private PreparedStatement pst;
    private ResultSet rs;
      public OffreService() {
    cnx=DataSource.getInstance().getCnx();
    }
    @Override
    public void insert(Offre t) {
        String req="insert into offres values('"+t.getIdOffre()+"','"+t.getDateDeb()+"','"+t.getDateFin()+"','"+t.getCode()+"')";
    
        try {
            st=cnx.createStatement();
            st.executeUpdate(req);
        } catch (SQLException ex) {
            Logger.getLogger(OffreService.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    public boolean update(Offre t) {
    String sql="UPDATE offres";
    try {
            pst=cnx.prepareStatement(sql);
            pst.executeUpdate();
            return true;
    }
            catch (SQLException ex) {
            Logger.getLogger(OffreService.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    @Override
    public boolean delete(int y) {
         String req="delete from offres where id_offre=?";
          try {
            pst=cnx.prepareStatement(req);
            pst.setInt(1,y);
            pst.executeUpdate();
            return  true;
        } catch (SQLException ex) {
            Logger.getLogger(OffreService.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    

    @Override
    public List<Offre> displayAll() {
         String req="select * from offres";
        List<Offre> list = new ArrayList<>();
        
        try {
            st=cnx.createStatement();
            rs=st.executeQuery(req);
            while(rs.next()){
                list.add(new Offre(rs.getString("id_offre"), rs.getString("DateDeb"), rs.getString("DateFin"),rs.getString("code")));
            }
        } catch (SQLException ex) {
            Logger.getLogger(OffreService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return list  ;
    }

   
    
    
}
