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
public class Admin {
    private String idAdmin,password;

    public Admin(String idAdmin, String password) {
        this.idAdmin = idAdmin;
        this.password = password;
    }

    public Admin() {
    }

    public String getIdAdmin() {
        return idAdmin;
    }

    public String getPassword() {
        return password;
    }

    public void setIdAdmin(String idAdmin) {
        this.idAdmin = idAdmin;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    @Override
    public String toString() {
        return "Admin{" + "idAdmin=" + idAdmin + ", password=" + password + '}';
    }
    
    
}
