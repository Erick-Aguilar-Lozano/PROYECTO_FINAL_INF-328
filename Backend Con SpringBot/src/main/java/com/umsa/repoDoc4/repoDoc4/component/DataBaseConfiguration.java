package com.umsa.repoDoc4.repoDoc4.component;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.core.env.Environment;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import org.springframework.stereotype.Component;

import javax.sql.DataSource;

@Component
public class DataBaseConfiguration {

    @Autowired
    private Environment environment;

    @Bean
    public DataSource getDataSource(){
        DriverManagerDataSource driverManagerDataSource = new DriverManagerDataSource();

        driverManagerDataSource.setDriverClassName(environment.getProperty("spring.datasource.driver-class-name"));
        driverManagerDataSource.setUrl(environment.getProperty("spring.datasource.url"));
        driverManagerDataSource.setUsername(environment.getProperty("spring.datasource.name"));
        driverManagerDataSource.setPassword(environment.getProperty("spring.datasource.password"));

        return driverManagerDataSource;
    }
}
