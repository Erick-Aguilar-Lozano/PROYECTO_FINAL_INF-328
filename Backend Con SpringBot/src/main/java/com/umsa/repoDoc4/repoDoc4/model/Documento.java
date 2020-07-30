package com.umsa.repoDoc4.repoDoc4.model;

public class Documento {
    private int id;
    private String titulo_p;
    private String titulo_s;
    private String idioma;
    private String tipo;
    private String ruta;
    private String descripcion;
    private String palabras_clave;
    private int id_editorial;

    public Documento() {
    }

    public Documento(int id, String titulo_p, String titulo_s, String idioma, String tipo, String ruta, String descripcion, String palabras_clave, int id_editorial) {
        this.id = id;
        this.titulo_p = titulo_p;
        this.titulo_s = titulo_s;
        this.idioma = idioma;
        this.tipo = tipo;
        this.ruta = ruta;
        this.descripcion = descripcion;
        this.palabras_clave = palabras_clave;
        this.id_editorial = id_editorial;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitulo_p() {
        return titulo_p;
    }

    public void setTitulo_p(String titulo_p) {
        this.titulo_p = titulo_p;
    }

    public String getTitulo_s() {
        return titulo_s;
    }

    public void setTitulo_s(String titulo_s) {
        this.titulo_s = titulo_s;
    }

    public String getIdioma() {
        return idioma;
    }

    public void setIdioma(String idioma) {
        this.idioma = idioma;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getRuta() {
        return ruta;
    }

    public void setRuta(String ruta) {
        this.ruta = ruta;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getPalabras_clave() {
        return palabras_clave;
    }

    public void setPalabras_clave(String palabras_clave) {
        this.palabras_clave = palabras_clave;
    }

    public int getId_editorial() {
        return id_editorial;
    }

    public void setId_editorial(int id_editorial) {
        this.id_editorial = id_editorial;
    }

    public void imprime(){
        System.out.println(id);
        System.out.println(this.descripcion);
        System.out.println(this.titulo_p);
    }
}
