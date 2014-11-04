using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model
{
    class Game
    {
        private model.Dealer m_dealer;
        private model.Player m_player;
        private model.NewCardListener newCardListener;

        public Game(NewCardListener ncl)
        {
            newCardListener = ncl;
            m_dealer = new Dealer(new rules.RulesFactory());
            m_player = new Player();
        }

        public bool IsGameOver()
        {
            return m_dealer.IsGameOver(m_player);
        }

        public bool IsDealerWinner()
        {
            return m_dealer.IsDealerWinner(m_player);
        }

        public bool NewGame()
        {
            return m_dealer.NewGame(m_player);
        }

        public bool Hit()
        {
            return m_dealer.Hit(m_player, newCardListener);
        }

        public bool Stand()
        {
            m_dealer.Stand(newCardListener);
            // TODO: Implement this according to Game_Stand.sequencediagram
            return true;
        }

        public IEnumerable<Card> GetDealerHand()
        {
            return m_dealer.GetHand();
        }

        public IEnumerable<Card> GetPlayerHand()
        {
            return m_player.GetHand();
        }

        public int GetDealerScore()
        {
            return m_dealer.CalcScore();
        }

        public int GetPlayerScore()
        {
            return m_player.CalcScore();
        }
    }
}
