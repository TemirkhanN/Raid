package Player;

import Overseer.Subject;

import java.util.ArrayList;
import java.util.List;

public class Party implements Subject {
    private final int MAX_MEMBERS = 3;

    private Player leader;
    private List<Player> members;

    Party(Player leader) {
        this.leader = leader;
        members = new ArrayList<Player>(MAX_MEMBERS);
        members.add(this.leader);
    }

    public List<Player> getMembers() {
        return members;
    }

    public Player getLeader() {
        return leader;
    }

    public void addMember(Player player) {
        if (members.size() == MAX_MEMBERS) {
            return;
        }

        members.add(player);
    }

    public boolean isFull() {
        return members.size() == MAX_MEMBERS;
    }
}
