using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model
{
    class Dealer : Player
    {
        private Deck m_deck = null;
        private const int g_maxScore = 21;
        private List<Observer> observers;

        private rules.INewGameStrategy m_newGameRule;
        private rules.IHitStrategy m_hitRule;
        private rules.IWinGameStrategy m_winRule;


        public Dealer(rules.RulesFactory a_rulesFactory, List<Observer> observerList)
        {
            observers = observerList;
            m_newGameRule = a_rulesFactory.GetNewGameRule();
            m_hitRule = a_rulesFactory.GetHitRule();
            m_winRule = a_rulesFactory.GetWinRule();
        }

        public bool NewGame(Player a_player)
        {
            if (m_deck == null || IsGameOver(a_player))
            {
                m_deck = new Deck();
                ClearHand();
                a_player.ClearHand();
                return m_newGameRule.NewGame(m_deck, this, a_player);   
            }
            return false;
        }

        public bool Hit(Player a_player)
        {
            if (m_deck != null && a_player.CalcScore() < g_maxScore && !IsGameOver(a_player))
            {
                /*Card c;
                c = m_deck.GetCard();
                c.Show(true);
                a_player.DealCard(c);*/
                DealCard(true, a_player);
                //Here we should have some sort of Observer notification
                return true;
            }
            return false;
        }

        public void DealCard (bool show, model.Player player) {
            Card c = m_deck.GetCard();
            c.Show(show);
            player.DealCard(c);
            foreach (var observer in observers) {
                observer.CardWasDealt(player);
            }
            
        }
        public bool IsDealerWinner(Player a_player)
        {
            return m_winRule.DidWin(this, a_player, g_maxScore);
        }

        public bool IsGameOver(Player a_player)
        {
            if (a_player.CalcScore() > g_maxScore || m_deck != null && /*CalcScore() >= g_hitLimit*/ m_hitRule.DoHit(this) != true)
            {
                return true;
            }
            return false;
        }
        public void Stand()
        {
            if (m_deck != null)
            {
                ShowHand();
            }
            while (m_hitRule.DoHit(this))
            {
                DealCard(true, this);
                //Here we should implement the Observer thingy also
            }
        }
    }
}
