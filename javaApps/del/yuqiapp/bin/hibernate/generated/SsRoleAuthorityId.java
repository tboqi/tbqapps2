// default package
// Generated 2010-2-22 17:34:53 by Hibernate Tools 3.2.4.GA


import javax.persistence.Column;
import javax.persistence.Embeddable;

/**
 * SsRoleAuthorityId generated by hbm2java
 */
@Embeddable
public class SsRoleAuthorityId  implements java.io.Serializable {


     private long roleId;
     private long authorityId;

    public SsRoleAuthorityId() {
    }

    public SsRoleAuthorityId(long roleId, long authorityId) {
       this.roleId = roleId;
       this.authorityId = authorityId;
    }
   


    @Column(name="role_id", nullable=false)
    public long getRoleId() {
        return this.roleId;
    }
    
    public void setRoleId(long roleId) {
        this.roleId = roleId;
    }


    @Column(name="authority_id", nullable=false)
    public long getAuthorityId() {
        return this.authorityId;
    }
    
    public void setAuthorityId(long authorityId) {
        this.authorityId = authorityId;
    }


   public boolean equals(Object other) {
         if ( (this == other ) ) return true;
		 if ( (other == null ) ) return false;
		 if ( !(other instanceof SsRoleAuthorityId) ) return false;
		 SsRoleAuthorityId castOther = ( SsRoleAuthorityId ) other; 
         
		 return (this.getRoleId()==castOther.getRoleId())
 && (this.getAuthorityId()==castOther.getAuthorityId());
   }
   
   public int hashCode() {
         int result = 17;
         
         result = 37 * result + (int) this.getRoleId();
         result = 37 * result + (int) this.getAuthorityId();
         return result;
   }   


}


