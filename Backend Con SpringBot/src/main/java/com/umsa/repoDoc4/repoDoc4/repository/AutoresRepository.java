package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.mapper.AutoresMapper;
import com.umsa.repoDoc4.repoDoc4.model.Autores;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import javax.annotation.PostConstruct;
import javax.sql.DataSource;
import java.awt.print.Pageable;
import java.util.List;

@Repository
public class AutoresRepository implements AutoresRep{
    @Autowired
    private DataSource dataSource;

    private JdbcTemplate jdbcTemplate;

    @PostConstruct
    public void autoresConstruct(){
        jdbcTemplate = new JdbcTemplate(dataSource);
    }

    public JdbcTemplate getJdbcTemplate() {
        return jdbcTemplate;
    }

    public void setJdbcTemplate(JdbcTemplate jdbcTemplate) {
        this.jdbcTemplate = jdbcTemplate;
    }

    @Override
    public boolean insert(Autores autores) {
        try{
            String sql = String.format(
                    "INSERT INTO autores(nombre) " +
                    "VALUES ('%s')",
                    autores.getNombre());
            jdbcTemplate.execute(sql);
            return true;
        } catch (Exception e){
            return false;
        }
    }

    @Override
    public boolean update(Autores autores) {
        if (autores.getId() != 0){
            try{
                String sql = String.format(
                        "UPDATE autores SET nombre='%s' " +
                        "WHERE id='%d'",
                        autores.getNombre(),autores.getId());
                jdbcTemplate.execute(sql);
                return true;
            } catch (Exception e){
                return false;
            }
        }
        return false;
    }

    @Override
    public List<Autores> findAll(SpringDataWebProperties.Pageable pageable) {
        return jdbcTemplate.query(
                "SELECT * FROM autores;",
                new AutoresMapper()
        );
    }

    @Override
    public Autores findById(int id) {
        Object[] params = new Object[]{id};
        return jdbcTemplate.queryForObject(
                "SELECT * FROM autores where id=?",
                params,
                new AutoresMapper()
        );
    }
}
