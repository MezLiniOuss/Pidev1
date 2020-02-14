/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pidev;

import connectionDB.DataSource;
import entity.Offre;
import entity.Transfert_coli;
import java.sql.SQLException;
import java.util.Scanner;
import service.IOffre;
import service.OffreService;
import service.transferService;

/**
 *
 * @author LENOVO
 */
public class PIDEV {
    
public static void main(String[] args) throws SQLException {
        // TODO code application logic here
        DataSource ds = DataSource.getInstance();
       
        Transfert_coli p=new Transfert_coli(7,"aza", "qsqsq", "Id","re");
        /*System.out.println(ds);
        System.out.println(ds2);
        System.out.println(ds3);*/
//Scanner sc = new Scanner(System.in);
//System.out.println("Veuillez le Id pour  le supprimer :");
//String id = sc.nextLine();
    //ps.insertPST(p);
    
    transferService ps=new transferService();
    //ps.delete(id);
 ps.Refuse(p);
     // ps.displayall().forEach(System.out::println);
//ps.displayCustomer(p).forEach(System.out::println);
     }
}

