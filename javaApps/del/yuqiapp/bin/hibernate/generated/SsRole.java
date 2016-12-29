// default package
// Generated 2010-2-22 17:34:53 by Hibernate Tools 3.2.4.GA


import java.util.HashSet;
import java.util.Set;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import static javax.persistence.GenerationType.IDENTITY;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.UniqueConstraint;

/**
 * SsRole generated by hbm2java
 */
@Entity
@Table(name="ss_role"
    ,catalog="yuqiapp_java"
    , uniqueConstraints = @UniqueConstraint(columnNames="name") 
)
public class SsRole  implements java.io.Serializable {


     private Long id;
     private String name;
     private Set<SsUserRole> ssUserRoles = new HashSet<SsUserRole>(0);
     private Set<SsRoleAuthority> ssRoleAuthorities = new HashSet<SsRoleAuthority>(0);

    public SsRole() {
    }

	
    public SsRole(String name) {
        this.name = name;
    }
    public SsRole(String name, Set<SsUserRole> ssUserRoles, Set<SsRoleAuthority> ssRoleAuthorities) {
       this.name = name;
       this.ssUserRoles = ssUserRoles;
       this.ssRoleAuthorities = ssRoleAuthorities;
    }
   
     @Id @GeneratedValue(strategy=IDENTITY)

    
    @Column(name="id", unique=true, nullable=false)
    public Long getId() {
        return this.id;
    }
    
    public void setId(Long id) {
        this.id = id;
    }

    
    @Column(name="name", unique=true, nullable=false)
    public String getName() {
        return this.name;
    }
    
    public void setName(String name) {
        this.name = name;
    }

@OneToMany(fetch=FetchType.LAZY, mappedBy="ssRole")
    public Set<SsUserRole> getSsUserRoles() {
        return this.ssUserRoles;
    }
    
    public void setSsUserRoles(Set<SsUserRole> ssUserRoles) {
        this.ssUserRoles = ssUserRoles;
    }

@OneToMany(fetch=FetchType.LAZY, mappedBy="ssRole")
    public Set<SsRoleAuthority> getSsRoleAuthorities() {
        return this.ssRoleAuthorities;
    }
    
    public void setSsRoleAuthorities(Set<SsRoleAuthority> ssRoleAuthorities) {
        this.ssRoleAuthorities = ssRoleAuthorities;
    }




}


