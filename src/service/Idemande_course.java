/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import java.util.List;


/**
 *
 * @author mahdi
 */
public interface Idemande_course <T>{
    void insert(T t);
    boolean update(T t);
    boolean Validation(T t);
    boolean Refuse(T t);
    boolean delete (String y);
    List <T> displayall();
}
