
package service;

import java.util.List;

/**
 *
 * @author mahdi
 */
public interface Itransfert_coli <T> {
      void insert(T t);
    boolean update(T t);
     boolean Valide(T t);
       boolean Refuse(T t);
    boolean delete (String id);
    List <T> displayall();
     List <T> displayCustomer(T t);
      List <T> displayTransporter(T t);
      
}
