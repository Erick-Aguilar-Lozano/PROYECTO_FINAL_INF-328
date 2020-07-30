package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.model.Escrito;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.awt.print.Pageable;
import java.util.List;

@Repository
public class EscritoRepository implements EscritoRep{
    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Override
    public boolean insert(Escrito object) {
        try{
            String sql = String.format(
                    "INSERT INTO escrito(id_documento, id_autor) " +
                    "VALUES ('%d', '%d')",
                    object.getId_documento(), object.getId_autor());
            jdbcTemplate.execute(sql);
            return true;
        } catch (Exception e){
            return false;
        }
    }

    @Override
    public boolean update(Escrito object) {
        if (object.getId_documento() != 0){
            try{
                String sql = String.format(
                        "UPDATE escrito SET id_documento='%d',id_autor='%d' " +
                        "WHERE id_documento='%d'",
                        object.getId_documento(),object.getId_autor(), object.getId_documento());
                jdbcTemplate.execute(sql);
                return true;
            } catch (Exception e){
                return false;
            }
        }
        return false;
    }

    @Override
    public List<Escrito> findAll(SpringDataWebProperties.Pageable pageable) {
        return jdbcTemplate.query(
                "SELECT * FROM escrito",
                new com.umsa.repoDoc4.repoDoc4.mapper.EscritoMapper()
        );
    }

    @Override
    public Escrito findById(int id_documento) {
        Object[] params = new Object[]{id_documento};
        return jdbcTemplate.queryForObject(
                "SELECT * FROM escrito",
                params,
                new com.umsa.repoDoc4.repoDoc4.mapper.EscritoMapper()
        );
    }
}
