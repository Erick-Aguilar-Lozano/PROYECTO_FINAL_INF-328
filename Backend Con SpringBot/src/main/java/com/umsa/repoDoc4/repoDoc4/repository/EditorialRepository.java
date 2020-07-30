package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.model.Editorial;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.awt.print.Pageable;
import java.util.List;

@Repository
public class EditorialRepository implements EditorialRep{
    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Override
    public boolean insert(Editorial object) {
        try{
            String sql = String.format(
                    "INSERT INTO editorial(nombre) " +
                    "VALUES ('%s')",
                    object.getNombre());
            jdbcTemplate.execute(sql);
            return true;
        } catch (Exception e){
            return false;
        }
    }

    @Override
    public boolean update(Editorial object) {
        if (object.getId() != 0){
            try{
                String sql = String.format(
                        "UPDATE editorial SET nombre='%s'" +
                        "WHERE id='%d'",
                        object.getNombre(),object.getId());
                jdbcTemplate.execute(sql);
                return true;
            } catch (Exception e){
                return false;
            }
        }
        return false;
    }

    @Override
    public List<Editorial> findAll(SpringDataWebProperties.Pageable pageable) {
        return jdbcTemplate.query(
                "SELECT * FROM editorial",
                new com.umsa.repoDoc4.repoDoc4.mapper.EditorialMapper()
        );
    }

    @Override
    public Editorial findById(int id) {
        Object[] params = new Object[]{id};
        return jdbcTemplate.queryForObject(
                "SELECT * FROM editorial where id=?",
                params,
                new com.umsa.repoDoc4.repoDoc4.mapper.EditorialMapper()
        );
    }
}
