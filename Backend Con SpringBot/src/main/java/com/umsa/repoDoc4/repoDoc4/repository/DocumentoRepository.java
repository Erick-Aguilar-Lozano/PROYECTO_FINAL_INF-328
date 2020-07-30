package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.model.Documento;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.awt.print.Pageable;
import java.util.List;

@Repository
public class DocumentoRepository implements DocumentoRep{
    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Override
    public boolean insert(Documento object) {
        try{
            String sql = String.format(
                    "INSERT INTO documento(titulo_p, titulo_s, idioma, tipo, ruta, descripcion, palabras_clave, id_editorial) " +
                    "VALUES ('%s','%s','%s','%s','%s','%s','%s','%d');",
                    object.getTitulo_p(), object.getTitulo_s(), object.getIdioma(), object.getTipo(), object.getRuta(),
                    object.getDescripcion(), object.getPalabras_clave(), object.getId_editorial());
            jdbcTemplate.execute(sql);
            return true;
        } catch (Exception e){
            return false;
        }
    }

    @Override
    public boolean update(Documento object) {
        if (object.getId() != 0){
            try{
                String sql = String.format(
                        "UPDATE documento SET titulo_p='%s',titulo_s='%s',idioma='%s',tipo='%s',ruta='%s',descripcion='%s',palabras_clave='%s',id_editorial='%d' " +
                        "WHERE id='%d'",
                        object.getTitulo_p(), object.getTitulo_s(), object.getIdioma(), object.getTipo(), object.getRuta(),
                        object.getDescripcion(), object.getPalabras_clave(), object.getId_editorial());
                jdbcTemplate.execute(sql);
                return true;
            } catch (Exception e){
                return false;
            }
        }
        return false;
    }

    @Override
    public List<Documento> findAll(SpringDataWebProperties.Pageable pageable) {
        return jdbcTemplate.query(
                "SELECT * FROM documento",
                new com.umsa.repoDoc4.repoDoc4.mapper.DocumentoMapper()
        );
    }

    @Override
    public Documento findById(int id) {
        Object[] params = new Object[]{id};
        return jdbcTemplate.queryForObject(
                "SELECT * FROM documento where id=?",
                params,
                new com.umsa.repoDoc4.repoDoc4.mapper.DocumentoMapper()
        );
    }
}
