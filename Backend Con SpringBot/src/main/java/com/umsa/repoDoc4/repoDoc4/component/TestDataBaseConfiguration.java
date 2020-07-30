package com.umsa.repoDoc4.repoDoc4.component;

import com.umsa.repoDoc4.repoDoc4.repository.AutoresRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.jdbc.datasource.DriverManagerDataSource;

import javax.sql.DataSource;

//@Configuration
public class TestDataBaseConfiguration {
    @Bean
    public DataSource getDataSource(){
        DriverManagerDataSource driverManagerDataSource = new DriverManagerDataSource();
        //driverManagerDataSource.setDriverClassName("com.mysql.jdbc.Driver");
        driverManagerDataSource.setDriverClassName("com.mysql.cj.jdbc.Driver");
        driverManagerDataSource.setUrl("jdbc:mysql://localhost:3306/biblioteca_test");
        driverManagerDataSource.setUsername("vico");
        driverManagerDataSource.setPassword("vico");

        return driverManagerDataSource;
    }

    @Bean
    public AutoresRepository autoresRepository(){
        return new AutoresRepository();
    }
}
